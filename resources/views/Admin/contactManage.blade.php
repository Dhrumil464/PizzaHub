<link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">

<body id="body-pd" style="background: #80808045;">
    @extends('admin.layouts.nav')
    @section('content')
        {{-- <div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%" id='notempty'>
            <strong>Info!</strong> If problem is not related to the order then order id = 0
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div> --}}
        <style>
            .btn-danger-gradiant {
                background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
            }

            .btn-danger-gradiant:hover {
                background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
            }

            .table-responsive::-webkit-scrollbar {
                display: none;
            }
        </style>
        <div style="margin-right: 32px;display: table;margin-left: auto;">
            <button type="button" class="btn btn-danger-gradiant text-white border-0 py-2 px-3 mx-2 my-3" data-toggle="modal"
                data-target="#history"><span> HISTORY <i class="ti-arrow-right"></i></span></button>
        </div>
        <div class="container-fluid" id='empty'>
            <div class="row">
                <div class="card col-lg-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover col-md-12 text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>UserId</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Order Id</th>
                                        <th>Message</th>
                                        <th>datetime</th>
                                        <th>Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- $sql = "SELECT * FROM contact"; 
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row=mysqli_fetch_assoc($result))
                                $contactId = $row['contactId'];
                                $userId = $row['userId'];
                                $email = $row['email'];
                                $phoneNo = $row['phoneNo'];
                                $orderId = $row['orderId'];
                                $message = $row['message'];
                                $time = $row['time'];
                                $count++; --}}

                                    <tr>
                                        <td>1</td>
                                        <td>101</td>
                                        <td>example@gmail.com</td>
                                        <td>12345</td>
                                        <td>1</td>
                                        <td>Hello</td>
                                        <td>03/03/25 19:40</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                                data-target="#reply">Reply</button>
                                        </td>
                                    </tr>
                                    @php
                                        $count = 1;
                                        $totalReply = 1;
                                    @endphp
                                    @if ($count == 0)
                                        <script>
                                            document.getElementById("notempty").innerHTML =
                                                '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not recieve any message!	</div>';
                                            document.getElementById("empty").innerHTML = '';
                                        </script>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- $contactsql = "SELECT * FROM `contact`";
$contactResult = mysqli_query($conn, $contactsql);
while($contactRow = mysqli_fetch_assoc($contactResult)){
$contactId = $contactRow['contactId'];
$Id = $contactRow['userId']; --}}

        <!-- Reply Modal -->
        <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="reply" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-light" style="background-color: #4b5366;">
                        <h5 class="modal-title" id="reply">Reply (Contact Id: $contactId)</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="partials/_contactManage.php" method="post">
                            <div class="text-left my-2">
                                <b><label for="message">Message: </label></b>
                                <textarea class="form-control" id="message" name="message" rows="2" required minlength="5"></textarea>
                            </div>
                            <input type="hidden" id="contactId" name="contactId" value="$contactId">
                            <input type="hidden" id="userId" name="userId" value="$Id">
                            <button type="submit" class="btn btn-success" name="contactReply">Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- history Modal -->
        <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-light" style="background-color: #4b5366;">
                        <h5 class="modal-title" id="history">Your Sent Message</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="notReply">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover col-md-12 text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Contact Id</th>
                                        <th>Reply Message</th>
                                        <th>datetime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- $sql = "SELECT * FROM `contactreply`"; 
                    $result = mysqli_query($conn, $sql);
                    $totalReply = 0;
                    while($row=mysqli_fetch_assoc($result))
                        $contactId = $row['contactId'];
                        $message = $row['message'];
                        $datetime = $row['datetime'];
                        $totalReply++; --}}

                                    <tr>
                                        <td>contactId</td>
                                        <td>message</td>
                                        <td>datetime</td>
                                    </tr>

                                    @if ($totalReply == 0)
                                        <script>
                                            document.getElementById("notReply").innerHTML =
                                                '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Reply any message!	</div>';
                                        </script>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
