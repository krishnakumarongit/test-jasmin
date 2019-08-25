<div class="eleven columns">
	<div class="padding-right">
Question No. <?php echo ($data['page']+1); ?>
		
<hr />

<br />

<h4 class=""><?php echo ucfirst($data['results']['question']); ?></h4>
		<form method="post" action="">
		 <input type="hidden" name="post_check" value="1" />
		 <input type="hidden" name="question_id" value="<?php echo $data['results']['question_id']; ?>" /><br />
<ul style="padding:2px 0">
		<?php 		
		    if (count($data['results']['answer']) > 0) { 
				foreach ($data['results']['answer'] as $row => $val) {
					if ($data['question_bank'][$data['page']]['answer'] ==  $val['id']) {
						echo '<li style="padding:10px;"><input class="chk_class subject-list" onclick="selectOnlyThis('.$val['id'].')"  id="Check'.$val['id'].'" type="checkbox" name="answer[]" checked value="'.$val['id'].'">  '.$val['answer'].'</li>';
					} else {
						echo '<li style="padding:10px;"><input class="chk_class subject-list" onclick="selectOnlyThis('.$val['id'].')" id="Check'.$val['id'].'" type="checkbox" name="answer[]" value="'.$val['id'].'">  '.$val['answer'].'</li>';
					}
			}} 
		?>&nbsp;
</ul>
		
		
		
		
		
		

<table style="width:100%;">
<tr>
<td style="text-align:left;"><input type="submit" name="submit" value="submit"></td>
<td style="text-align:right;">
<input type="submit" name="review"  style="background-color:#FF4500" value="Mark for review">&nbsp;
<?php echo $data['previous']; ?>&nbsp;<?php echo $data['next']; ?>&nbsp;

</td>
</tr>
</table>


		</form>
</div>
<br />
</div>

<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			
			<div class="job-overview">
				
				<nav class="pagination">
					<ul>
						
					
		<?php 
//echo "<pre>";
//print_r($data['question_bank']);
//exit;
		    if (count($data['question_bank']) > 0) {
			foreach ($data['question_bank'] as $row => $val) { 
		?>
			<li style="<?php if($val['answer'] !=0) { ?>background:#26ae61;	color: #fff;<?php } elseif($val['review'] ==1) {?> background:#FF4500;color: #fff;<?php } ?>"><a style="<?php if($val['answer'] !=0) { ?>background:#26ae61;	color: #fff;<?php } elseif($val['review'] == 1) {?>background:#FF4500;color: #fff;<?php } ?>" href="<?php echo site_url('crack/'.$row); ?>"><?php echo $row + 1 ?></a>
</li>
		<?php }} ?>


		
</ul>
				</nav>
<div style="clear:both;padding-top:10px;">
<span>
<a style="background:#FF4500;color: #FF4500;" href="javascript:void(0);">12</a> -Review 
</span><br />
<span>
<a style="background:#26ae61;	color: #26ae61;" href="javascript:void(0);">22</a> -Answered
</span><br />
<span>
<a style="	color:#f2f2f2;
	background-color: #f2f2f2;
" href="javascript:void(0);">22</a> -Unanswered
</span>
</div>

				<div style="clear:both;">
					
				</div>

			</div>

		</div>

	</div>

<style>
.pagination ul li{
margin:1px;
}
</style>

	
