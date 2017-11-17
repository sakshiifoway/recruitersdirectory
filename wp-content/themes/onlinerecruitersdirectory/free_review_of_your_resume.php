<?php
/**
 * Template Name: Free review of your resume
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
        <div class="inner_page_content executive-content">
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
            <!--<p><strong>Do you get enough positive  responses to your resume?</strong></p>
            <p><strong>If the answer is "Yes", you do not need to continue reading this page.</strong></p>
            <p><strong>If the answer is “No”,  you can still change it.</strong></p>
            <p><strong>It is important to read  this page and take the necessary actions to increase your response rate.</strong></p>
            <p>Getting a job in today’s poor economy means taking extra  steps so your resume is not just in good shape, but in perfect order.  Sending out more resumes that are just “okay”  won’t improve your odds of landing a job. What you need in today’s competitive  market is a resume that stands out from the crowd.<br />
            Your resume isn’t just a document that summarizes your  skills, experience and contact information, but a marketing brochure that should  make the hiring manager eager to interview you. If you’re a marketing expert with  lot of experience and you know how to convey a message, then by all means -.. do it  yourself.  Otherwise, hire a professional  resume writer.</p>
            <p>When you need legal assistance you go to a lawyer, when you prepare  your tax return you go to a tax expert, and when your pipes leak you call a plumber.  Therefore, if you don’t have excellent  writing and marketing skills, don’t try to save money by writing your own  resume.</p>
            <p>A professional resume writer is trained to write a resume  that emphasizes your best abilities, quickly draws attention to your greatest assets, and clearly describes your strengths in an attention-grabbing  manner.  In other words, they’ll write  your resume to catch a prospective employer’s attention.  And in today’s market that is just what you  need.  A professional resume service can help  you land a good job much more quickly,which means more money in your pocket.  In the long term, the money you invest in a  professional service will pay for itself and is money well spent.</p>
            <p>When looking  for the right professional resume service, keep these points in mind:</p>
            <ul>
            <li>Cover letters are the first thing that a Human  Resources Professional sees.  Find a  company that includes cover letters with their services.</li>
            <li>Find a service that will contact you personally  to discuss your employment information.   They will ask you questions that will provoke a hiring manager's interest.  Sometimes it’s hard to toot your own horn,  but a seasoned and experienced resume writer will do just that with tact and professionalism.</li>
            <li>Find a service experienced in writing different  types of resumes, from Entry-Level all the way up to Executive.  It shows they are diversified and can tailor  your resume for the job you want.</li>
            <li>The resume service should guarantee an interview  in thirty days or rewrite it for free.   It means they stand behind their work.</li>
            <li>Find a service that sends a thank you or  follow-up letter.  It might be the extra  mileage you need for a prospective employer to take notice and hire you.</li>
            </ul>
            <p>Resume  Services Online is a resume service that we like to recommend; we found that  they have great service, excellent results, and reasonable prices.<br />
            Their website is:  <strong><a href="http://www.resumeservicesonline.com" rel="nofollow" class="link_arial12" style="float:none; text-decoration:underline;" target="_blank">www.resumeservicesonline.com</a></strong></p>
            <p><strong>Our best advice these days -.. Make sure you have a resume that gets you hired!</strong></p>
            <hr />
            <span class="jobseeker_coupon"><img src="http://com81/onlinerecruitersdirectory/wp-content/uploads/2017/10/coupons_v1.gif" alt="" class="alignleft size-full wp-image-305" height="100" width="147">We managed to get you a 20% Discount Coupon if you order their service today, <?php echo date("m/d/Y"); ?>, Use Coupon Code: <span class="coupon_img"><label><?php echo "ORD".date("md"); ?></label></span>(Enter the coupon code in the comments field and you will receive an instant rebate.)</span>-->
        </div>
    </div>
</section>
<!--- Inner End --->

<?php get_footer();