<div class="content-wrapper">
  <section class="content-header">
    <h2 style="margin:0; padding:0;">System Overview</h2>
  </section>
  <div class="box-header with-border">
  </div>

  <div class="col-lg-4">
    <h3>Collections</h3>
    <table class="table table-hover">
      <tr>
        <th>Types</th>
        <th>Titles</th>
        <th>Copies</th>
      </tr>
      <tr>
        <td>Books</td>
        <td><?php echo $TotalTitles_book; ?></td>
        <td><?php echo $TotalCopies_book; ?></td>
      </tr>
      <tr>
        <td>Serials</td>
        <td><?php echo $TotalTitles_serials; ?></td>
        <td><?php echo $TotalCopies_serials; ?></td>
      </tr>
      <tr>
        <td>Theses/Dissertations</td>
        <td><?php echo $TotalTitles_Theses; ?></td>
        <td><?php echo $TotalCopies_Theses; ?></td>
      </tr>
      <tr>
        <td>Non-Prints</td>
        <td><?php echo $TotalTitles_NP; ?></td>
        <td><?php echo $TotalCopies_NP; ?></td>
      </tr>
      <tr>
        <td>Vertical Files</td>
        <td><?php echo $TotalTitles_VF; ?></td>
        <td><?php echo $TotalCopies_VF; ?></td>
      </tr>
      <tr>
        <td>Investigatory Projects</td>
        <td><?php echo $TotalTitles_IP; ?></td>
        <td><?php echo $TotalCopies_IP; ?></td>
      </tr>
      <tr>
        <td>Technical Reports</td>
        <td><?php echo $TotalTitles_TR; ?></td>
        <td><?php echo $TotalCopies_TR; ?></td>
      </tr>
      <tr>
        <td>Reprints</td>
        <td><?php echo $TotalTitles_reprints; ?></td>
        <td><?php echo $TotalCopies_reprints; ?></td>
      </tr>
      <tr>
        <td>Analytics</td>
        <td><?php echo $TotalTitles_Analytics; ?></td>
        <td><?php echo $TotalCopies_Analytics; ?></td>
      </tr>

      <tfoot>
        <tr>
          <td><b>Total</b></td>
          <td><i><?php echo $TotalTitles; ?></i></td>
          <td><i><?php echo $TotalCopies; ?></i></td>
        </tr>
      </tfoot>

    </table>
  </div>

  <div class="col-lg-4">
    <h3>OPAC</h3>
    <h4 class="SO_indents">Most Searched word: </h4>
    <h4 class="SO_indents">Most Downloaded Material: </h4>

    <h3>Patrons</h3>
    <h4 class="SO_indents">Registered Users: </h4>
    <h4 class="SO_indents">Unique Guests today: </h4>
  </div>

</div>
