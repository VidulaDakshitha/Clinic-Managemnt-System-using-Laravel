@extends('master')
@section('content')

@section('title', 'User Priscription')

<div class="container-fluid">
    <!-- Search bar -->

    <h2>Responsive Table with DataTables</h2>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
            <caption class="text-center">An example of a responsive table based on <a href="" target="_blank">DataTables</a>:</caption>
            <thead>




              <tr>
              <th>Priscription id</th>
              <th>name</th>
              <th>description</th>
              <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
            </tr>


            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" class="text-center">Data retrieved from <a href="" target="_blank">infoplease</a> and <a href="http://www.worldometers.info/world-population/population-by-country/" target="_blank">worldometers</a>.</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>














</div>

@endsection
