@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile details</div>

                <div class="card-body">
                    @include('notification')
                    <form method="POST" action="{{ route('profile.save') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id ?? 0}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name ?? '-' }}"  >
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="email" value="{{ Auth::user()->email ?? '-' }}" >
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('contact') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="contact" value="{{ Auth::user()->contact ?? '-' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="present_location" class="col-md-4 col-form-label text-md-right">{{ __('Present Location') }}</label>

                            <div class="col-md-6">
                                <input id="present_location" type="text" class="form-control" name="present_location" value="{{ old('present_location') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('Prefered Location') }}</label>

                            <div class="col-md-6">
                                <input id="prefered_location" type="text" class="form-control" name="prefered_location" value="{{ old('prefered_location') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('SSLC') }}</label>

                            <div class="col-md-6">
                                <input id="sslc" type="text" class="form-control" name="sslc" value="{{ old('sslc') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="puc" class="col-md-4 col-form-label text-md-right">{{ __('PUC') }}</label>

                            <div class="col-md-6">
                                <input id="puc" type="text" class="form-control" name="puc" value="{{ old('puc') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('stream') }}</label>

                            <div class="col-md-6">
                                <input id="stream" type="text" class="form-control" name="stream" value="{{ old('stream') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('cgpa') }}</label>

                            <div class="col-md-6">
                                <input id="cgpa" type="number" class="form-control" name="cgpa" value="{{ old('cgpa') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('Passed Out Year') }}</label>

                            <div class="col-md-6">
                                <input id="passed_out_year" type="number" class="form-control" name="passed_out_year" value="{{ old('passed_out_year') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('College Name') }}</label>

                            <div class="col-md-6">
                                <input id="college_name" type="text" class="form-control" name="college_name" value="{{ old('college_name') }}" required>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select name="city_id"  class="form-control">
                                    <option value="">-Select-</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        @if(Auth::user()->user_type == 2) 

                            <div class="form-group row">
                                <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('Company Details') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="company_details"></textarea>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <input id="role" type="text" class="form-control" name="role" value="{{ old('role') }}" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Joining_date" class="col-md-4 col-form-label text-md-right">{{ __('Joing Date') }}</label>

                                <div class="col-md-6">
                                    <input id="joining_date" type="text" class="form-control" name="joining_date" value="{{ old('joining_date') }}" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prefered_location" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

                                <div class="col-md-6">
                                    <input id="skills" type="text" class="form-control" name="skills" value="{{ old('skills') }}" required>

                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
