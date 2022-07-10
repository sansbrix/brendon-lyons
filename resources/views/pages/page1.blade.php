@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Zip Code">
                  </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary mt-0">Search</button>
                </div>
              </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr><th>
                    Zip code
                  </th>
                  <th>
                    Status
                  </th>
                  <th class="text-right">
                      Reason
                  </th>
                </tr></thead>
                <tbody>
                  <tr>
                    <td>
                      342342
                    </td>
                    <td>
                      true
                    </td>
                    <td class="text-right">
                      reason
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
