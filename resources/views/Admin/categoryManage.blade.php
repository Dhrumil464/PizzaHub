<div class="container-fluid" style="margin-top:98px" id="cside">
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
                <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-header text-light"
                            style="background: #4b5366;border-top-left-radius: 10px; border-top-right-radius: 10px;">
                            Create New Category
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Category Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category Desc: </label>
                                <input type="text" class="form-control" name="desc" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="control-label">Image</label>
                                <input type="file" name="image" id="image" accept=".jpg" class="form-control"
                                    required style="border:none;">
                                <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <button type="submit" name="createCategory" class="btn btn-md btn-primary"> Create
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
                                        <th class="text-center" style="width:7%;">Id</th>
                                        <th class="text-center">Img</th>
                                        <th class="text-center" style="width:58%;">Category Detail</th>
                                        <th class="text-center" style="width:18%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- $sql = "SELECT * FROM `categories`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $catId = $row['categorieId'];
                                $catName = $row['categorieName'];
                                $catDesc = $row['categorieDesc']; --}}

                                    <tr>
                                        <td class="text-center"><b>$catId</b></td>
                                        <td><img src="/img/card-1.jpg" alt="image for this Category" width="120px"
                                                height="120px"></td>
                                        <td>
                                            <p>Name : <b>$catName</b></p>
                                            <p>Description : <b class="truncate">$catDesc</b></p>
                                        </td>
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                                <button class="btn btn-sm btn-primary edit_cat" type="button"
                                                    data-toggle="modal" data-target="#updateCat">Edit</button>
                                                <form action="partials/_categoryManage.php" method="POST">
                                                    <button name="removeCategory" class="btn btn-sm btn-danger"
                                                        style="margin-left:9px;">Delete</button>
                                                    <input type="hidden" name="catId" value="'.$catId. '">
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

{{-- $catsql = "SELECT * FROM `categories`";
    $catResult = mysqli_query($conn, $catsql);
    while($catRow = mysqli_fetch_assoc($catResult)){
        $catId = $catRow['categorieId'];
        $catName = $catRow['categorieName'];
        $catDesc = $catRow['categorieDesc']; --}}

<!-- Modal -->
<div class="modal fade" id="updateCat" tabindex="-1" role="dialog" aria-labelledby="updateCat" aria-hidden="true"
    style="width: -webkit-fill-available;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color: #4b5366;">
                <h5 class="modal-title" id="updateCat">Category Id: <b> $catId </b>
                </h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                        <div class="form-group col-md-8">
                            <b><label for="image">Image</label></b>
                            <input type="file" name="catimage" id="catimage" accept=".jpg"
                                class="form-control" required style="border:none;"
                                onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
                            <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                            <input type="hidden" id="catId" name="catId" value="$catId">
                            <button type="submit" class="btn btn-success my-1" name="updateCatPhoto">Update
                                Img</button>
                        </div>
                        <div class="form-group col-md-4">
                            <img src="/img/card-1.jpg" id="itemPhoto" name="itemPhoto" alt="Category image"
                                width="100" height="100">
                        </div>
                    </div>
                </form>
                <form action="partials/_categoryManage.php" method="post">
                    <div class="text-left my-2">
                        <b><label for="name">Name</label></b>
                        <input class="form-control" id="name" name="name" value="$catName" type="text"
                            required>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="desc">Description</label></b>
                        <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6">$catDesc</textarea>
                    </div>
                    <input type="hidden" id="catId" name="catId" value="$catId">
                    <button type="submit" class="btn btn-success" name="updateCategory">Update</button>
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
