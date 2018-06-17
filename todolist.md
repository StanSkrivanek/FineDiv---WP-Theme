### TODO
---

* :fire: ADVERTS INTO PAGE
* Contact form Page (Allecadd)
* Subscription Form (page)
* Advertise Page ( Options & Condition) Check Services for Selling Ads on https://www.buysellads.com
* Guest Posting Page
* Licence Page ???
* Plugin or service for Payment
* Images - positioning and optimisation
* Social Media: Twitter, Github, Facebook?, Codepen
* :+1:in Contact form page add option for message issues
    - Advertising / Become a Sponsor
    - Become an author
    - Books / Conferences / Shop / Job board
    - Bug report
    - Link suggestion
    - Press release
    - Release a freebie
    - Voicing an opinion
    - Membership
* in Contact form:
    Regex for email (no wrong characters allowed)
* workshops - sort workshops chronologically by the event date
* In contact page  make sure that message is scrolling up (remove scrolling sidebar).
Problem is that by typing message expadning down but page is static
and on iPad text of next line is hidden

### Revisit
---
* Try more possibilities to generate random post page and figure out what is better ( more officiant ) solution
    - first solution https://www.youtube.com/watch?v=fOUwQW5agJ4 is applied
    - second solution  https://stackoverflow.com/questions/8672401/get-random-post-in-wordpress

* Create form for posting jobs (Now is only HTML without CSS)
    - Job title
    - Job position
    - Job Type : Full Time, Part Time or Remote
    - Job Execution : On Site, Remote
    - Job Location: Town, Country
    - Company Name
    - Link to Advertising Company to their Job description page
    - Advertiser Contact email
    - Job Description (text area with markdown code option )

* About Page (Content & CSS)
* Comments !!!


### Ideas
---
* Display single post next/prev nav only when post has more parts in series.
Custom post style or maybe custom post type


### Fixes
---
* :+1: fix shrinking TOPICS button on resize
* fix automatic focus for search button vie "SetFocus"
* fix comments on xs width
* make all - li a {display:block};

    ```php
        // place this code into function.php

        add_action('init','random_add_rewrite');
        function random_add_rewrite() {
           global $wp;
           $wp->add_query_var('random');
           add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
        }

        add_action('template_redirect','random_template');
        function random_template() {
           if (get_query_var('random') == 1) {
                   $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
                   foreach($posts as $post) {
                           $link = get_permalink($post);
                   }
                   wp_redirect($link,307);
                   exit;
           }
        }
    ```


