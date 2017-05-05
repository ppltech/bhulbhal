  <div class="single_sidebar">
    <div class="panel panel-default wow fadeInUp">
      <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>Notice Board</b></div>
      <div class="panel-body">
        <div class="row">
          <div class="col-xs-12">
            <ul class="demo1">
            <?php foreach ($message as $value) { ?>
            	<li class="news-item">
                <table cellpadding="4">
                  <tr>
                    <td><?php echo $value->notice_title;?> ... <br />
                      <a class="text-warning pull-right" href="<?php echo Yii::$app->request->baseUrl.'/notice'?>">[Read more]</a></td>
                  </tr>
                </table>
              </li>
           <?php  }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel-footer"> </div>
    </div>
  </div>
