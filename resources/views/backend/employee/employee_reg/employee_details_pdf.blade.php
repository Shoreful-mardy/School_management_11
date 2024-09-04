<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <td>
      <img src="{{ public_path('upload/easyschool.png') }}" width="200" height="100">
    </td>
    <td>
      <h2>Easy School ERP </h2>
      <p>School Address</p>
      <p>Phone : +8801781566968</p>
      <p>Email : support@easyschoolbd.com</p>
    </td>
  </tr>
</table>

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee Name</b></td>
    <td>{{ $item->name}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Father Name</b></td>
    <td>{{ $item->fname}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Mother Name</b></td>
    <td>{{ $item->mname}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Id No</b></td>
    <td>{{ $item->id_no}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Mobile No</b></td>
    <td>{{ $item->phone}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Address</b></td>
    <td>{{ $item->address}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Gender</b></td>
    <td>{{ $item->gender}}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Religion</b></td>
    <td>{{ $item->religion}}</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>Date Of Birth</b></td>
    <td>{{ date('d-m-Y',strtotime($item->dob))}}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><b>Designation</b></td>
    <td>{{ $item->designation->name}}</td>
  </tr>
  <tr>
    <td>11</td>
    <td><b>Join Date</b></td>
    <td>{{ date('d-m-Y',strtotime($item->join_date))}}</td>
  </tr>
</table>

</body>
</html>


