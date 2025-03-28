<link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">

<body id="body-pd" style="background: #80808045;">
    @extends('admin.layouts.nav')
    @section('content')
        <div class="container-fluid" style="margin-top: 98px" id="cside">
            <div class="col-lg-12">
                <div class="row">
                    <!-- FORM Panel -->
                    <div class="col-md-4">
                        <form action="{{ route('category.addCategory') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-header text-light"
                                    style="background: #4b5366;border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    Add New Category
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label">Category Name: </label>
                                        <input type="text" class="form-control" name="catname"
                                            value="{{ old('catname') }}">
                                        @error('catname')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Description: </label>
                                        <textarea type="text" class="form-control" name="catdesc">{{ old('catdesc') }}</textarea>
                                        @error('catdesc')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label">Image: </label>
                                        <input type="file" name="catimage" id="image" class="form-control">
                                        @error('catimage')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-md btn-primary"> Add
                                                Category
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- FORM Panel -->

                    <!-- Table Panel -->
                    @if (count($categories) > 0)
                        <div class="col-md-8 mb-3" id="side">
                            <div class="card" style="border-radius: 12px;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="width:7%;">Cat.Id</th>
                                                    <th class="text-center">Img</th>
                                                    <th class="text-center" style="width:58%;">Category Detail</th>
                                                    <th class="text-center" style="width:18%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $cat)
                                                    <tr>
                                                        <td class="text-center"><b>{{ $cat->catid }}</b></td>
                                                        <td><img src="/catimages/{{ $cat->catimage }}"
                                                                alt="image for this Category" width="120px" height="120px">
                                                        </td>
                                                        <td>
                                                            <p>Name : <b>{{ $cat->catname }}</b></p>
                                                            <p>Description : <b class="truncate">{{ $cat->catdesc }}</b></p>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="row mx-auto" style="width: 90px;">
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#updateCat{{ $cat->catid }}"
                                                                    style="width: 40px; height: 40px; border-radius: 8px;">
                                                                    <i class="fas fa-edit"></i></button>
                                                                <form
                                                                    action="{{ route('category.destroyCategory', ['catid' => $cat->catid]) }}"
                                                                    method="get">
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
                                    <h2 class="text-center alert alert-danger">No Category Found</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Table Panel -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        @foreach ($categories as $cat)
            <div class="modal fade" id="updateCat{{ $cat->catid }}" tabindex="-1" role="dialog"
                aria-labelledby="updateCat{{ $cat->catid }}" aria-hidden="true" style="width: -webkit-fill-available;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-light" style="background-color: #4b5366;">
                            <h5 class="modal-title" id="updateCat{{ $cat->catid }}">Category Id: 
                                <b> {{ $cat->catid }} </b>
                            </h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('category.updateImage', ['catid' => $cat->catid]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                                    <div class="form-group col-md-8">
                                        <b><label for="image">Image</label></b>
                                        <input type="file" name="catimagee" id="catimage" class="form-control"
                                            onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])"
                                            required>
                                        @error('catimagee')
                                            <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-success my-1" name="updateCatPhoto">Update
                                            Img</button>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <img src="/catimages/{{ $cat->catimage }}" id="itemPhoto" alt="Category image"
                                            width="100" height="100">
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('category.updateCategory', ['catid' => $cat->catid]) }}"
                                method="post">
                                @csrf
                                @method('put')
                                <div class="text-left my-2">
                                    <b><label for="name">Category Name</label></b>
                                    <input class="form-control" id="name" name="catnamee"
                                        value="{{ $cat->catname }}" type="text" required>
                                    @error('catnamee')
                                        <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-left my-2">
                                    <b><label for="desc">Description</label></b>
                                    <textarea class="form-control" id="desc" name="catdesce" rows="2">{{ $cat->catdesc }}</textarea>
                                    @error('catdesce')
                                        <span class="alert alert-danger px-3 py-0 rounded-sm">{{ $message }}</span>
                                    @enderror
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
