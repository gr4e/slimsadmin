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
    <h4 class="SO_indents">Most Searched word: <b><?php echo $MostSearchWord; ?></b></h4>
    <h4 class="SO_indents">Most Downloaded Material: <b><?php echo $MostDownloadedFile; ?></b></h4>

    <h3>Patrons</h3>
    <h4 class="SO_indents">Registered Users: <b><?php echo $TotalRegisteredPatron; ?></b></h4>
    <h4 class="SO_indents">Unique Guests today: <b><?php echo $UniqueGuest2Day; ?></b></h4>
  </div>



  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Browser Usage</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="chart-responsive">
            <canvas id="pieChart" height="150"></canvas>
          </div>
          <!-- ./chart-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <ul class="chart-legend clearfix">
            <li><i class="far fa-circle text-danger"></i> Chrome</li>
            <li><i class="far fa-circle text-success"></i> IE</li>
            <li><i class="far fa-circle text-warning"></i> FireFox</li>
            <li><i class="far fa-circle text-info"></i> Safari</li>
            <li><i class="far fa-circle text-primary"></i> Opera</li>
            <li><i class="far fa-circle text-secondary"></i> Navigator</li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer bg-white p-0">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a href="#" class="nav-link">
            United States of America
            <span class="float-right text-danger">
              <i class="fas fa-arrow-down text-sm"></i>
              12%</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            India
            <span class="float-right text-success">
              <i class="fas fa-arrow-up text-sm"></i> 4%
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            China
            <span class="float-right text-warning">
              <i class="fas fa-arrow-left text-sm"></i> 0%
            </span>
          </a>
        </li>
      </ul>
    </div>
    <!-- /.footer -->
  </div>
  <!-- /.card -->





</div>
