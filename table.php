<?php
require_once 'Dao.php';

function renderTable () {
  $dao = new Dao();
  $comments = $dao->getComments();
//   if (count($comments) == 0) {
//     echo "No comments yet";
//     exit;
//   }
  ?>
  <table>
    <thead>
    <th>Name</th><th id="reviewCol">Review</th><th>Date</th><th>Delete</th>
    </thead>
   <?php
    foreach ($comments as $comment) {
      // echo "<tr><td class='reviewCol'>" . htmlspecialchars($comment['comment']) . "</td><td class='dateCol'>{$comment['dateEntered']}</td><td class='delete'><a href='delete.php?id={$comment['commentID']}'>X</a></td></tr>";
      echo "<tr><td class='nameCol'>" . htmlspecialchars($comment['name']) . "</td><td class='reviewCol'>" . htmlspecialchars($comment['comment']) . "</td><td class='dateCol'>{$comment['dateEntered']}</td><td class='delete'><a href='delete.php?id={$comment['commentID']}'>X</a></td></tr>";
    }
   ?>
  </table>
<?php
}
?>