<?php
/**
 * Template Name: Jobs Form
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area job_form__page">
        <main id="main" class="site-main" role="main">
            <section id="page_content_container" class="page_content__container ">
                <header>
                    <h1>Post a Job</h1>
                    <p>If you would like to hire people that are passioned about Programing or Design such
                        Web Developers, Web Designers, Programmers or people with any kind of IT skills to help you
                        or your company bring into world amazing products or services please feel free to fill our form below.
                    </p>
                </header>
                <form action="action_page.php">
                    <div class="form-content-container">
                        <h4>Basic Info</h4>
                        <div class="job_form__job-title">

                            <label for="jobtitle"><b>Job Title</b></label>
                            <input type="text" placeholder="Name of position" name="jobtitle" required>

                        </div>
                        <div class="job_form__job-company">
                            <label for="company-name"><b>Company Name</b></label>
                            <input type="text" placeholder="Town" name="town" required></br>
                        </div>
                        <div class="job_form__job-location">

                            <h4>Job Location</h4>
                            <input id="onsite" type="radio" checked="checked" name="jobtype">
                            <label for="onsite">On Site</label><br/>

                            <input id="remote" type="radio" name="jobtype">
                            <label for="remote">Remote</label><br/>
                            <label for="town"><b>Town</b></label>
                            <input type="text" placeholder="Town" name="town" required></br>
                            <div class="job_form__job-country form-radio-group">
                                <input id="cz" type="radio" checked="checked" name="country">
                                <label for="cz">CZ</label>
                                <input id="sk" type="radio" name="country">
                                <label for="sk">SK</label>
                            </div>

                        </div>
                        <h4>Job Type</h4>
                        <div class="job_form__job-type form-radio-group">
                            <div class="topics-left ">

                                <input id="fulltime" type="radio" checked="checked" name="jobtype">
                                <label for="fulltime">Full Time</label><br/>

                                <input id="parttime" type="radio" name="jobtype">
                                <label for="parttime">Part Time</label><br/>

                                <input id="contract" type="radio" name="jobtype">
                                <label for="contract">Contract</label><br/>

                                <input id="freelance" type="radio" name="jobtype">
                                <label for="freelance"> Freelance</label><br/>
                            </div>

                            <div class="topics-right ">


<!--                                <input id="onsite" type="radio" checked="checked" name="jobtype">-->
<!--                                <label for="onsite">On Site</label><br/>-->
<!---->
<!--                                <input id="remote" type="radio" name="jobtype">-->
<!--                                <label for="remote">Remote</label><br/>-->
                            </div>
                        </div>

                        <div class="job_form__job-description">

                            <h4>Job Description</h4>
                            <label for="joblink"><b>Job Position URL</b></label>
                            <input type="text" placeholder="http://yourcompany/jobs/job.html" name="extrainfo"></br>

                            <textarea id="job_overview" name="job-overview" placeholder="job overview. use Markdown"
                                      rows="4" cols="50">
                            </textarea>

                        </div>
                        <!-- <h4>Additional Info</h4>-->
                        <div class="job_form__companyAddInfo">

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Contact Email" name="extrainfo" required>

                        </div>

                        <div class="job_form__terms">
                            <h4>Terms</h4>
                            <p>I understand that my listing may be removed if it is for a position that involves adult
                                content,an illegitimate work opportunity, an incorrect job type (i.e. freelance when it
                                should be listed as full-time),or contains inappropriate language. If removed within
                                7 days after posting, a refund will be issued.</p>
                            <label for="terms">
                                <input type="checkbox" name="terms" required> I Agree
                            </label>
                        </div>
                        <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->
                        <div class="clearfix job_form__buttons">
                            <button type="button" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn">Post Position</button>
                        </div>
                    </div><!-- container -->
                </form>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
