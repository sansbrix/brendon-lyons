@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Edit Zip Code</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-12 px-1">
                  <div class="form-group">
                    <label>Zip Code</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 px-1">
                  <div class="form-group">
                    <label>Reason</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 px-1">
                  <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection
