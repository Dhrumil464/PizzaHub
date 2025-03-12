<link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">

<body id="body-pd" style="background: #80808045;">
    @extends('admin.layouts.nav')
    @section('content')
        <div class="container-fluid" style="margin-top:98px" id="cside">
            <div class="col-lg-12">
                <div class="row">
                    <!-- FORM Panel -->
                    <div class="col-md-4">
                        <form action="{{ route('pizzaitem.addPizzaItem') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card" style="border-radius: 12px;">
                                <div class="card-header text-light"
                                    style="background: #4b5366;border-top-right-radius: 12px; border-top-left-radius: 10px;">
                                    Add New Item
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label">Pizza Name: </label>
                                        <input type="text" class="form-control" name="pizzaname"
                                            value="{{ old('pizzaname') }}">
                                        @error('pizzaname')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category: </label>
                                        <select name="catid" id="categoryId" class="custom-select browser-default">
                                            <option hidden disabled selected value>None</option>
                                            @foreach (App\Models\Categories::all() as $category)
                                                <option value="{{ $category->catid }}">{{ $category->catname }}</option>
                                            @endforeach
                                        </select>
                                        @error('catid')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Price: </label>
                                        <input type="number" class="form-control" name="pizzaprice" min="1"
                                            value="{{ old('pizzaprice') }}">
                                        @error('pizzaprice')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Discount (%): </label>
                                        <input type="number" class="form-control" name="discount"
                                            value="{{ old('discount') }}">
                                        @error('discount')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Description: </label>
                                        <textarea cols="30" rows="3" class="form-control" name="pizzadesc">{{ old('pizzadesc') }}</textarea>
                                        @error('pizzadesc')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label">Image: </label>
                                        <input type="file" name="pizzaimage" id="image" class="form-control">
                                        @error('pizzaimage')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-md btn-primary">
                                                Add Item
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- FORM Panel -->

                    <!-- Table Panel -->
                    @if (count($pizzaitems) > 0)
                        <div class="col-md-8 mb-3" id="side">
                            <div class="card" style="border-radius: 12px;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="width:7%;">Cat.Id</th>
                                                    <th class="text-center">Img</th>
                                                    <th class="text-center" style="width:58%;">Item Detail</th>
                                                    <th class="text-center" style="width:18%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pizzaitems as $item)
                                                    <tr>
                                                        <td class="text-center"><b>{{ $item->catid }}</b></td>
                                                        <td class="text-center">
                                                            <img src="/pizzaimages/{{ $item->pizzaimage }}"
                                                                alt="image for this item" width="100px" height="120px">
                                                        </td>
                                                        <td>
                                                            <p>PizzaName : <b>{{ $item->pizzaname }}</b></p>
                                                            <p>Description : <b class="truncate">{{ $item->pizzadesc }}</b>
                                                            </p>
                                                            <p>Price : <b>$ {{ $item->pizzaprice }} /-</b></p>
                                                            <p>Discount : <b>{{ $item->discount }} %</b></p>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="row mx-auto" style="width: 90px;">
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#updateItem{{ $item->pizzaid }}"
                                                                    style="width: 40px; height: 40px; border-radius: 8px;">
                                                                    <i class="fas fa-edit"></i></button>
                                                                <form action="{{ route('pizzaitem.destroyPizzaItem', ['pizzaid' => $item->pizzaid]) }}" method="get">
                                                                    <button name="removeCategory"
                                                                        class="btn btn-sm btn-danger"
                                                                        style="width: 40px; height: 40px; border-radius: 8px; margin-left: 7px;"><i
                                                                            class="fas fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-8">
                            <div class="card pt-3 pl-4 pr-4" style="border-radius: 12px;">
                                <div class="card-body">
                                    <h2 class="text-center alert alert-danger">No Items Found</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Table Panel -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        @foreach ($pizzaitems as $item)
            <div class="modal fade " id="updateItem{{ $item->pizzaid }}" tabindex="-1" role="dialog"
                aria-labelledby="updateItem{{ $item->pizzaid }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-light" style="background-color: #4b5366;">
                            <h5 class="modal-title" id="updateItem{{ $item->pizzaid }}">Item Id:
                                <b> {{ $item->pizzaid }} </b>
                            </h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pizzaitem.updatePizzaImage', ['pizzaid' => $item->pizzaid]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                                    <div class="form-group col-md-8">
                                        <b><label for="image">Image</label></b>
                                        <input type="file" name="pizzaimagee" id="pizzaimage" class="form-control"
                                            onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])"
                                            required>
                                        @error('pizzaimagee')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update
                                            Img</button>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <img src="/pizzaimages/{{ $item->pizzaimage }}" id="itemPhoto" alt="item image"
                                            width="100" height="100">
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('pizzaitem.updatePizzaItem', ['pizzaid' => $item->pizzaid]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="text-left my-2">
                                    <b><label for="name">Name</label></b>
                                    <input class="form-control" id="name" name="pizzanamee" value="{{ $item->pizzaname }}"
                                        type="text" required>
                                    @error('pizzaimagee')
                                        <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-left my-2 row">
                                    <div class="form-group col-md-6">
                                        <b><label for="price">Price</label></b>
                                        <input class="form-control" id="price" name="pizzapricee" value="{{ $item->pizzaprice }}"
                                            type="number" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <b><label for="discount">Discount (%)</label></b>
                                        <input class="form-control" id="discount" name="discounte"
                                            value="{{ $item->discount }}" type="number" required>
                                    </div>
                                </div>
                                <div class="text-left my-2">
                                    <b><label for="catId">Category Id</label></b>
                                        <input class="form-control" id="catId" name="catide"
                                            value="{{ $item->catid }}" type="number" required>
                                </div>
                                <div class="text-left my-2">
                                    <b><label for="desc">Description</label></b>
                                    <textarea class="form-control" id="desc" name="pizzadesce" rows="2" required minlength="6">{{ $item->pizzadesc }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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
