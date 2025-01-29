<div class="row my-3">
    <div class="col-12">
        <h3>Elections</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Election Name</th>
      <th scope="col"># Candidates</th>
      <th scope="col">Starting On</th>
      <th scope="col">Ending On</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
        <?php
            $fetchingData = mysqli_query($db,"SELECT * FROM elections") or die(mysqli_error($db));
            $isAnyElectionAdded = mysqli_num_rows($fetchingData);

            if($isAnyElectionAdded > 0)
            {
                $sno = 1;
                while($row = mysqli_fetch_assoc($fetchingData))
                {
                    $electionid = $row['id'];
                    ?>
                            <tr>
                                <td><?php echo $sno++; ?></td>
                                <td><?php echo $row['electiontopic'] ?></td>
                                <td><?php echo $row['noofcandidates'] ?></td>
                                <td><?php echo $row['startingdate'] ?></td>
                                <td><?php echo $row['endingdate'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                               <td>
                                <a href="ondx.php?viewResults=<?php echo $electionid;  ?>" class="btn btn-sm btn-success"> View Results</a>
                               </td>

                            </tr>
                    <?php
                }
            }else {
                ?>
                    <tr>
                        <td colspan="7"> No any election is added yet. </td>
                    </tr>
                <?php
            }
        ?>
  </tbody>

</table>
    </div>
</div>


    

 

