<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Booking</strong></div>
                        <div class="block-body">
                            <form action="{{ url('edit_booking', $data->id) }}" method="Post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" value="{{ $data->nama }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" value="{{ $data->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="telpon" value="{{ $data->telpon }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Tanggal Mulai</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="starDate" value="{{ $data->start_date }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Tanggal Selesai</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="endDate" value="{{ $data->end_date }}" class="form-control">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" value="" class="btn btn-primary">Update Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>