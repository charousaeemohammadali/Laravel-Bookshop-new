@extends('admin.layouts.layouts')
@section('content')
    <div class="content-wrapper" style="min-height: 600px;">

        <section class="content-header">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> لیست خرید ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">


                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th> نام خریدار</th>
                                        <th>نام کتاب</th>
                                        <th>قیمت</th>
                                        <th>تاریخ</th>

                                    </tr>

                                    @foreach($buys as $buy)
                                        <tr>
                                            <td>{{ $buy->user->name }} {{ $buy->user->lastname }}</td>
                                            <td><a href="{{ route('books.edit' , $buy->book->id) }}">{{ $buy->book->book_name }}</a></td>
                                            <td>{{ $buy->price }}</td>
                                            <td>{{ $buy->created_at }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
        </section>

    </div>
@endsection
