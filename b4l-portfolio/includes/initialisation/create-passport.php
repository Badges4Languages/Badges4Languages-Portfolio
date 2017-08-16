<?php

function create_passport_callback(){
  ?>
    <table cellpadding="10">
      <tr>
        <td><h3>Select Learning Language:</h3></td>
        <td>
          <select>
            <option value="no">  Select</option>
            <option value="eng">English</option>
            <option value="spa">Spanish</option>
            <option value="chi">Chinese</option>
            <option value="arab">Arabic</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><h3>Select Passport Language:</h3></td>
        <td>
          <select>
            <option value="no">  Select</option>
            <option value="eng">English</option>
            <option value="spa">Spanish</option>
            <option value="chi">Chinese</option>
            <option value="arab">Arabic</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><button>Create Passport</button></td>
      </tr>
    </table>
<?php
}

 ?>
