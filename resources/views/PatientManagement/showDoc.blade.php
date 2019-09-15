@extends('main.layout.mainlayoutsearch')

@section('content')


<div class="page-container">

    <div class="container">
        <div class="row">
            <!-- BEGIN Right Column-->
            <div class="col-md-12">
                <!-- BEGIN Search Results-->
                <div id="search_results">
                    <div class="panel panel-default" style="background-color: white">
                        <div class="panel-body">
                            <div class="p-b-15 p-l-15 p-r-15">
                                <h4 class="p-b-10">Search Results</h4>



                                @foreach ($posts as $post)

                                <table class="table table-hover table-responsive-block">
                                    <tbody>
                                        <tr>





                                            <td scope="row" style="width:90%">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img style="padding:10%"
                                                            class="img-circle mini-profile-pic p-t-10" alt=""
                                                            src="/images/doc.png">

                                                    </div>
                                                    <div class="col-xs-8">
                                                        <h5 class="semi-bold">{{$post->fullname}}</h5>

                                                        <p class="no-margin text-uppercase pv">{{ $post->type }}</p>

                                                        <p class="pv">IHHR-Wellawatte </p>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="v-align-middle">
                                                <form action="available-sessions" method="post">
                                                    {{-- <input type="hidden" name="docName" value="PROF AJITH  MALALASEKARA">
                            <input type="hidden" name="doctorNo" value="D1011">
                            <input type="hidden" name="specName" value="Urologist">
                            <input type="hidden" name="specializationID"
                                   value="27">
                            <input type="hidden" name="hosCode" value="H07">
                            <input type="hidden" name="hosName" value="Lanka Hospitals">
                            <input type="hidden" name="appDay" value="">
                            <input type="hidden" name="appDate" value="Any">
                            <input type="hidden" name="hosTown" value="Colombo">
                            
                            
                                <input type="hidden" name="docNotes" value="CONSULTATION ONLY FOR PATIENTS 16 YEARS OR 
ABOVE.PLEASE DO NOT ACCEPT PENDING APPOINTMENTS
    "> --}}

                                                    <input type="submit" onclick="ShowProgressAnimation();"
                                                        class="btn btn-danger btn-sm" value="Book Now">
                                                    <input name="tid"
                                                        value="6c0fea5123fb5630d7298e92f9ab552adf96465002999c93b786270b90c312dd"
                                                        type="hidden">
                                                    <input name="modId" value="gen01" type="hidden">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                @endforeach








                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection