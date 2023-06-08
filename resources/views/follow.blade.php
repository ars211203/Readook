<style>
    table {
  width: 100%;
  margin: 100px 0;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}


.footer {
  height: 100px;
  background-color: #333;
  color: #fff;
  text-align: center;
  position: absolute;
  bottom: 0;
  width: 100%;
}
</style>
@include('header')
<table>
  <thead>
    <tr>
      <th>STT</th>
      <th>ID sách</th>
      <th>Tên sách</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>123</td>
      <td>Sách A</td>
    </tr>
    <tr>
      <td>2</td>
      <td>456</td>
      <td>Sách B</td>
    </tr>
    <tr>
      <td>3</td>
      <td>789</td>
      <td>Sách C</td>
    </tr>
  </tbody>
</table>
<div class="footer"> footer </div>
@include('footer')