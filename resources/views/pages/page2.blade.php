@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Zip Code">
                  </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary mt-0">Search</button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary mt-0">Upload Zip Codes</button>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Zip code
                  </th>
                  <th class="text-right">
                      Action
                  </th>
                </tr></thead>
                <tbody>
                  <tr>
                    <td>

                    </td>
                    <td>
                      342342
                    </td>
                    <td class="text-right">
                      <button class="btn btn-success">Edit</button>
                      <button class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
