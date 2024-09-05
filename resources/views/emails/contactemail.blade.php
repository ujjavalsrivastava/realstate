<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h2>For Contact Us</h2>

<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
  </tr>
  <tr>
    <td>{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->message}}</td>
  </tr>
</table>

<p>To understand the example better, we have added borders to the table.</p>

</body>
</html>

