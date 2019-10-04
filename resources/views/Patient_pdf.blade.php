<html>
    <header>
    </header>

<body>

    <div>
    <a href="{{url('patient_pdf/pdf')}}">Convert to pdf</a>
    </div>

    <table>
       
<tr>
    <th>patientID</th>
    <th>Full name</th>
    <th>Gender</th>
    <th>DOB</th>
    <th>NIC</th>
    <th>Address1</th>
    <th>Address2</th>
    <th>City</th>
    <th>phone</th>
    <th>Email</th>


</tr>
<tbody>
    @foreach ($patient_data as $patient)
    <tr>

<td>{{$patient->patient_id}}</td>
<td>{{$patient->fullname}}</td>
<td>{{$patient->gender}}</td>
<td>{{$patient->dob}}</td>
<td>{{$patient->nic}}</td>
<td>{{$patient->address1}}</td>
<td>{{$patient->address2}}</td>
<td>{{$patient->city}}</td>
<td>{{$patient->phone}}</td>
<td>{{$patient->email}}</td>
    </tr>
    @endforeach

</tbody>

    </table>
</body>
</html>