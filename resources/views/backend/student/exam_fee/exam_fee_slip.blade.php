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
  padding: 5px;
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
@php
  $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$item->class_id)->first();

  $originalfee = $registrationfee->amount;
  $discount = $item->discount->discount;
  $discounttablefee = $discount/100*$originalfee;
  $finalfee = (float)$originalfee-(float)$discounttablefee;
@endphp
<table id="customers">
  <tr>
    <td><h2>
      <? $image_path = '/upload/logo.jpg'; ?>
      <img src="{{ public_path('/upload/logo.jpg') }}" width="200" height="100">
    </h2></td>
    <td>
      <h2>Easy School ERP </h2>
      <p>School Address</p>
      <p>Phone : +8801781566968</p>
      <p>Email : support@easyschoolbd.com</p>
      <p>Student Exam Fee For <span style="color: red">{{ $exam_type }}</span>.</p>
    </td>
  </tr>
</table>

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>ID No</b></td>
    <td>{{ $item->student->id_no}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $item->roll }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $item->student->name}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Mother Name</b></td>
    <td>{{ $item->student->mname}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $item->year->name}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class</b></td>
    <td>{{ $item->class->name}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Exam Fee</b></td>
    <td>{{ $originalfee}}$</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee</b></td>
    <td>{{ $discount}}%</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>Fee For <span style="color: red">{{ $exam_type }}</span> .</b></td>
    <td>{{ $finalfee}}$</td>
  </tr>
</table>
<br>
<i style="font-size: 10px; float: left;">Print Date : {{ date("d M Y") }}</i>
<br>
<hr style="border: dashed 2px; width: 95%; color: black; margin-bottom: 50px;">
<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>ID No</b></td>
    <td>{{ $item->student->id_no}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $item->roll }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $item->student->name}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Mother Name</b></td>
    <td>{{ $item->student->mname}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $item->year->name}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class</b></td>
    <td>{{ $item->class->name}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Exam Fee</b></td>
    <td>{{ $originalfee}}$</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee</b></td>
    <td>{{ $discount}}%</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>Fee For <span style="color: red">{{ $exam_type }}</span> .</b></td>
    <td>{{ $finalfee}}$</td>
  </tr>
</table>
<br>
<i style="font-size: 10px; float: left;">Print Date : {{ date("d M Y") }}</i>
</body>
</html>


