<style>
  .form1{
    max-width: 960px;
    text-align: center;
    margin: 0 auto;
  }
  .error {
    border: 3px solid red;
  }
  .hidden{
    display: none;
  }
</style>
<body>
  <div class="table1">
    <table border="1">
      <tr>
        <th>Name</th>
        <th>EMail</th>
        <th>Year</th>
        <th>Pol</th>
        <th>Limbs</th>
        <th>Superpowers</th>
        <th>Bio</th>
      </tr>
      <?php
      foreach($users as $user){
          echo '
            <tr>
              <td>'.$user['name'].'</td>
              <td>'.$user['email'].'</td>
              <td>'.$user['year'].'</td>
              <td>'.$user['pol'].'</td>
              <td>'.$user['konech'].'</td>
              <td>';
                $user_pwrs=array(
                    "immortal"=>FALSE,
                    "noclip"=>FALSE,
                    "power"=>FALSE,
                    "telepat"=>FALSE
                );
                foreach($pwrs as $pwr){
                    if($pwr['per_id']==$user['id']){
                        if($pwr['name']=='immortal'){
                            $user_pwrs['immortal']=TRUE;
                        }
                        if($pwr['name']=='noclip'){
                            $user_pwrs['noclip']=TRUE;
                        }
                        if($pwr['name']=='power'){
                            $user_pwrs['power']=TRUE;
                        }
                      
                        if($pwr['name']=='telepat'){
                            $user_pwrs['telepat']=TRUE;
                        }
                    }
                }
                if($user_pwrs['immortal']){echo 'Immortal<br>';}
                if($user_pwrs['noclip']){echo 'NoClip<br>';}
                if($user_pwrs['power']){echo 'Power<br>';}
                if($user_pwrs['telepat']){echo 'Telepat<br>';}
              echo '</td>
              <td>'.$user['biogr'].'</td>
              <td>
                <form method="get" action="ind.php">
                  <input name=edit_id value='.$user['id'].' hidden>
                  <input type="submit" value=Edit>
                </form>
              </td>
            </tr>';
       }
      ?>
    </table>
    <?php
    printf('Пользователи с Immortal: %d <br>',$pwrs_count[0]);
    printf('Пользователи с NoClip: %d <br>',$pwrs_count[1]);
    printf('Пользователи с Power: %d <br>',$pwrs_count[2]);
    printf('Пользователи с Telepat: %d <br>',$pwrs_count[3]);
    ?>
  </div>
</body>
