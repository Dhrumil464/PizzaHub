<body id="body-pd" style="background: #80808045;">
    @extends('admin.layouts.nav')
    @section('content')
        <div class="container-fluid" style="margin-top:98px" id="cside">
            <div class="col-lg-12">
                <div class="row">
                    <!-- FORM Panel -->
                    <div class="col-md-4">
                        <form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card" style="border-radius: 12px;">
                                <div class="card-header text-light"
                                    style="background: #4b5366;border-top-right-radius: 12px; border-top-left-radius: 12px;">
                                    Create New Item
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label">Name: </label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Description: </label>
                                        <textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Price</label>
                                        <input type="number" class="form-control" name="price" required min="1">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category: </label>
                                        <select name="categoryId" id="categoryId" class="custom-select browser-default"
                                            required>
                                            <option hidden disabled selected value>None</option>
                                            {{-- $catsql = 'SELECT * FROM `categories`';
                                    $catresult = mysqli_query($conn, $catsql);
                                    while ($row = mysqli_fetch_assoc($catresult)) {
                                        $catId = $row['categorieId'];
                                        $catName = $row['categorieName'];
                                        echo '<option value="' . $catId . '">' . $catName . '</option>';
                                    } --}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="control-label">Image</label>
                                        <input type="file" name="image" id="image" accept=".jpg"
                                            class="form-control" required style="border:none;">
                                        <small id="Info" class="form-text text-muted mx-3">Please .jpg file
                                            upload.</small>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-md btn-primary"> Add Item
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- FORM Panel -->

                    <!-- Table Panel -->
                    <div class="col-md-8 mb-3" id="side">
                        <div class="card" style="border-radius: 12px;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center" style="width:7%;">Cat. Id</th>
                                                <th class="text-center">Img</th>
                                                <th class="text-center" style="width:58%;">Item Detail</th>
                                                <th class="text-center" style="width:18%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- $sql = 'SELECT * FROM `pizza`';
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $pizzaId = $row['pizzaId'];
                                    $pizzaName = $row['pizzaName'];
                                    $pizzaPrice = $row['pizzaPrice'];
                                    $pizzaDesc = $row['pizzaDesc'];
                                    $pizzaCategorieId = $row['pizzaCategorieId']; --}}

                                            <tr>
                                                <td class="text-center">$pizzaCategorieId</td>
                                                <td>
                                                    <img src="/img/pizza-1.jpg" alt="image for this item" width="120px"
                                                        height="120px">
                                                </td>
                                                <td>
                                                    <p>Name : <b>$pizzaName</b></p>
                                                    <p>Description : <b class="truncate">$pizzaDesc</b></p>
                                                    <p>Price : <b>$pizzaPrice</b></p>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row mx-auto" style="width: 90px">
                                                        <button class="btn btn-sm btn-primary" type="button"
                                                            data-toggle="modal" data-target="#updateItem"
                                                            style="width: 40px; height: 40px; border-radius: 8px;"><i
                                                                class="fas fa-edit"></i></button>
                                                        <form action="partials/_menuManage.php" method="get">
                                                            <button name="removeItem" class="btn btn-sm btn-danger"
                                                                style="width: 40px; height: 40px; border-radius: 8px; margin-left: 7px;"><i
                                                                    class="fas fa-trash"></i></button>
                                                            <input type="hidden" name="pizzaId" value="$pizzaId">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Panel -->
                </div>
            </div>
        </div>

        {{-- $pizzasql = "SELECT * FROM `pizza`";
    $pizzaResult = mysqli_query($conn, $pizzasql);
    while($pizzaRow = mysqli_fetch_assoc($pizzaResult)){
        $pizzaId = $pizzaRow['pizzaId'];
        $pizzaName = $pizzaRow['pizzaName'];
        $pizzaPrice = $pizzaRow['pizzaPrice'];
        $pizzaCategorieId = $pizzaRow['pizzaCategorieId'];
        $pizzaDesc = $pizzaRow['pizzaDesc']; --}}

        <!-- Modal -->
        <div class="modal fade " id="updateItem" tabindex="-1" role="dialog" aria-labelledby="updateItem"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-light" style="background-color: #4b5366;">
                        <h5 class="modal-title" id="updateItem">Item Id: $pizzaId</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
                            <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                                <div class="form-group col-md-8">
                                    <b><label for="image">Image</label></b>
                                    <input type="file" name="itemimage" id="itemimage" accept=".jpg"
                                        class="form-control" required style="border:none;"
                                        onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
                                    <small id="Info" class="form-text text-muted mx-3">Please .jpg file
                                        upload.</small>
                                    <input type="hidden" id="pizzaId" name="pizzaId" value="$pizzaId">
                                    <button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update
                                        Img</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="/img/pizza-1.jpg" id="itemPhoto" name="itemPhoto" alt="item image"
                                        width="100" height="100">
                                </div>
                            </div>
                        </form>
                        <form action="partials/_menuManage.php" method="post">
                            <div class="text-left my-2">
                                <b><label for="name">Name</label></b>
                                <input class="form-control" id="name" name="name" value="<$pizzaName"
                                    type="text" required>
                            </div>
                            <div class="text-left my-2 row">
                                <div class="form-group col-md-6">
                                    <b><label for="price">Price</label></b>
                                    <input class="form-control" id="price" name="price" value="$pizzaPrice"
                                        type="number" min="1" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <b><label for="catId">Category Id</label></b>
                                    <input class="form-control" id="catId" name="catId" value="$pizzaCategorieId"
                                        type="number" min="1" required>
                                </div>
                            </div>
                            <div class="text-left my-2">
                                <b><label for="desc">Description</label></b>
                                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6">$pizzaDesc</textarea>
                            </div>
                            <input type="hidden" id="pizzaId" name="pizzaId" value="$pizzaId">
                            <button type="submit" class="btn btn-success" name="updateItem">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .table-responsive::-webkit-scrollbar {
                display: none;
            }

            @media screen and (max-width : 767px) {
                #cside {
                    padding: 0 30px 20px 20px;
                }

                #side {
                    margin: 20px 0;
                }
            }
        </style>
    @endsection
</body>
