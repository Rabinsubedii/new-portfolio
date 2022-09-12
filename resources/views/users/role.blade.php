@extends('layouts.app1', ['activePage' => 'user-management', 'titlePage' => __('role Assignmnet')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      
      @can('assign_roles')
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/assignrole/{{$user->id}}" class="form-horizontal">
             
            @csrf
           

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Assign role To {{$user->name}}</h4>
                <p class="card-category">{{ __('Assign role to user') }}</p>
              </div>
              <div class="card-body ">
                
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Roles') }}</label>
                  <div class="col-sm-7">
                  @foreach($roles as $role)
                    <div class="form-group">
                      
                    <input class="form-check-input" type="radio" value="{{$role->name}}" id="flexCheckChecked" name='role' required>
                    
                    <label class="form-check-label" for="flexCheckChecked">
                      {{$role->name}}
                    </label>
                    
                      <!-- @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif -->
                    </div>
                    @endforeach
                  </div>
                </div>
                
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Assign role') }}</button>
              </div>
            </div>
            
    </div>
    @endcan
  </div>
@endsection