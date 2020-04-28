@extends('layouts.lecturer')

@section('body')
 
<div class="content-body"><!-- Simple User Cards -->
            <section id="configuration">
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="margin: auto"> <br>	
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Generate Code</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <form class="form" method="post" action="{{ route('qrCode') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="course_code">Enter Course Code</label>
                                                    <input type="text" name="course_code" id="course_code" class="form-control" required="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions" align="center">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Generate
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

@endsection