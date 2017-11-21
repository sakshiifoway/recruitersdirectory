<?php
/**
 * Template Name: Executive $100K job seekers
*/
get_header(); ?>


<!--- Inner Start --->
<section class="inner_page">
	<div class="container">
    	<ul class="breadcrum">
            <li><a href="<?php bloginfo( 'home' ); ?>/">Home </a>&rarr;</li>
            <li><?php the_title(); ?></li>
        </ul>
    	<h1><?php the_title(); ?></h1>
        <div class="executive-content">
        <?php
			$my_postid = get_the_ID();//This is page id or post id
			$content_post = get_post($my_postid);
			$content = $content_post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			
			$content = str_replace('[TODAYDATE]', date("m/d/Y"), $content);
			$content = str_replace('[TODAYCODE]', '<span class="coupon_img"><label>ORD'.date("md").'</label></span>', $content);
			echo $content;
		?>
        <!--<p><strong>If you are a $100K+ job seeker, make sure you take the following 5 actions below:</strong></p>
        <p><strong>If you are not a $100K+ job seeker, go to </strong><a href="our_recommendations.php" class="link_arial12" style="float:none;"><strong>this page</strong></a></p>
        <p><a href="#" class="link_arial12"><strong>current action 1: Post in the right Board</strong></a></p>
        <p>If you are an Executive job seeker, we would like to make sure that you have posted your resume in 6FigureJobs the leading online job board for executives. <br>
        6FigureJobs offers a free service for executives. <br>
        You can post your Resume with full confidentiality!</p>
        <p>Consistently named Forbes “Best of the Web” by Forbes magazine, 6FigureJobs is ranked the industry-leading job board for Executive Job Seekers and Career Resources. It offers thousands of jobs ranging from senior manager level to "C-Level" (CIO, CFO, CEO, etc.). The positions posted are from all types of companies,including hundreds of Fortune 1000 companies to smaller organizations,as well as executive recruiting firms. It is the top destination for thousands of Corporate HR and Executive Recruiters looking to find and hire top professional talent for their $100K+ positions.</p>
        <p>Post your resume now by clicking on the link below and start getting serious offers from employers who are looking to hire executives:<br><a href="http://www.anrdoezrs.net/click-1787850-9335897" rel="nofollow" target="_blank" class="link_arial12" style="text-decoration:underline;">www.6FigureJobs.com</a></p>
        <hr>
        <p><a href="#" class="link_arial12"><strong>current action 2:  Write a Resume That Gets You   Hired </strong></a></p>
        <p><strong>Do you get enough positive responses to   your resume?</strong></p>
        <p><strong>If the answer is “No”,you still have the ability to change   it.</strong></p>
        <p>Getting a job in today’s bad economy means   taking extra steps so your resume is not just in good shape, but in perfect   order.&nbsp; Sending out more resumes that are   just “okay” won’t improve your odds of landing a job. What you need in today’s   competitive market is a resume that stands out from the   crowd.</p>
        <p>Did you know that a well-written resume can   bring you up to 12 times more responses, and help you get better job   offers?</p>
        <p>If you are looking for a $100,000+ annual salary, start with a   resume that effectively promotes you as the type of executive candidate   companies prefer to hire.</p>
        <p>As an executive with a lengthy history, strong   expertise, and many achievements, partner with Resume   Services Online &nbsp;to prepare a professional resume to express your   authentic story so employers take notice.</p>
        <p><strong>Our best advice these days &ndash;  Make sure you have a resume that gets you   hired!</strong></p>
        <span class="jobseeker_coupon"><img src="http://com81/onlinerecruitersdirectory/wp-content/uploads/2017/10/coupons_v1.gif" alt="" class="alignleft size-full wp-image-305" height="100" width="147">We managed to get you a 20% Discount Coupon if you order their service today, <?php echo date("m/d/Y"); ?>, Use Coupon Code: <span class="coupon_img"><label><?php echo "ORD".date("md"); ?></label></span>(Enter the coupon code in the comments field and you will receive an instant rebate.)</span>
        <hr>
        <p><a href="#" class="link_arial12"><strong>current action 3: Hidden Jobs &ndash; Check weekly </strong></a></p>
        <p><a href="http://employment.topechelon.com/web80815/jobs.asp" rel="nofollow" target="_blank" class="link_arial12" style="text-decoration:underline;">Open Jobs &ndash; Recruiters Database</a> Check thousands of open jobs in the largest nationwide recruiters database. You can’t find these positions in other job boards.</p>
        <hr>
        <p><a href="#" class="link_arial12"><strong>current action 4: Get Alerts</strong></a></p>
        <p>There are a lot of $100K+ jobs that are not listed on job boards. How will you find them?</p>
        <p>"The Ladders" is a unique service that informs $100K+ job seekers about new jobs that can’t be found on any job board. This is a great way to be informed about hidden positions.</p>
        <p>Enroll today to the free subscription of this service and increase your chances of finding your $100K+ job.</p>
        <p>By posting your resume in the 6Figure job board (see links above) and enrolling in the free subscription with the Ladder (see link below) you cover more than 90% of open $100K+ positions in the market.</p>
        <p>For free a subscription with the Ladder:<br>
        <a href="http://www.kqzyfj.com/ad74js0ys-FHNONOLGFHGMOHHIP" rel="nofollow" target="_blank" onmouseover="window.status='http://www.theladders.com';return true;" onmouseout="window.status=' ';return true;" class="link_arial12" style="text-decoration:underline;">Find Thousands of Relevant Jobs</a><img src="http://www.tqlkg.com/s679ltxlrpACIJIJGBACBHJCCDK" style="display: none ! important;" height="1" border="0" width="1"></p>
        <hr>
        <p><a href="#" class="link_arial12"><strong>current action 5: Multiple Posting</strong></a></p>
        <p>This action will cost you money, but based on the feedback we are receiving, this is the best investment you can make while searching for a job.</p>
        <p>Just one simple form makes your resume and job requirements instantly available to employers and recruiters on up to 84 of the very best career web sites. This resume-posting service gives you massive exposure.</p>
        <p>It takes job seekers ONLY 5 minutes &amp; saves them more than 60 hours of research and data entry.<br>
        <a href="http://www.anrdoezrs.net/click-1787850-5965663" rel="nofollow" target="_blank" class="link_arial12" style="text-decoration:underline;">ResumeRabbit.com</a></p>-->
  		</div>
    </div>
</section>
<!--- Inner End --->

<?php get_footer();