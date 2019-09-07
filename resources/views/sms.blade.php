@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">


                    </div>

                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{$error}}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        @endif


                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif


                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif

                        <form action="{{route('smsStore')}}" method="POST">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="number">Number</label>
                                <input name="number"  class="form-control" id="name" value="{{old('number')}}">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="message" id="message" cols="5" rows="5" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Send It</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
