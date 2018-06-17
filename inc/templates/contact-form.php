<form id="FineDivContactForm" class="FineDiv-contact-form" name="contactUs"
      action="#" method="post"
      data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">
    <h4>Please tell us about yourself.</h4>
    <div class="form-group">
        <input type="text" class="form-control FineDiv-form-control" placeholder="What's your name?" id="name"
               name="name">
        <small class="text-danger form-control-msg">Your Name is Required</small>
    </div>

    <div class="form-group">
        <input type="email" class="form-control FineDiv-form-control" placeholder="What email can we reach you at?"
               id="email" name="email">
        <small class="text-danger form-control-msg">Your Email is Required</small>
    </div>
    <h4>What is it about?</h4>
    <div id="contact_topic" class="form-radio-group">
        <div class="topics-left">

            <input type="radio" id="rd_opinion" name="user_topic"
                   value="Voicing an opinion" onclick="selectedTopic();">
            <label for="rd_opinion">Voicing an opinion</label><br>

            <input type="radio" id="rd-author" name="user_topic"
                   value="Become an Author" onclick="selectedTopic();">
            <label for="rd-author">Become an Author</label><br>

            <input type="radio" id="rd-ads" name="user_topic"
                   value="Advertising / Sponsoring" onclick="selectedTopic();">
            <label for="rd-ads">Advertising / Sponsoring</label><br>

            <input type="radio" id="rd-shop" name="user_topic"
                   value="Shop / Job board" onclick="selectedTopic();">
            <label for="rd-shop">Shop / Job board</label><br>

            <input type="radio" id="rd-press" name="user_topic"
                   value="Press Release" onclick="selectedTopic();">
            <label for="rd-press">Press Release</label><br>

        </div>
        <div class="topics-right">
            <input type="radio" id="rd-books" name="user_topic"
                   value="Books / Conferences" onclick="selectedTopic();">
            <label for="rd-books">Books / Conferences</label><br>

            <input type="radio" id="rd-freebie" name="user_topic"
                   value="Release a freebie" onclick="selectedTopic();">
            <label for="rd-freebie">Release a freebie</label><br>

            <input type="radio" id="rd-link" name="user_topic"
                   value="Links suggestion" onclick="selectedTopic();">
            <label for="rd-link">Link suggestion</label><br>

            <input type="radio" id="rd-membership" name="user_topic"
                   value="Membership" onclick="selectedTopic();">
            <label for="rd-membership">Membership</label><br>

            <input type="radio" id="rd-bugs" name="user_topic" value="Bugs reports" onclick="selectedTopic();">
            <label for="rd-bugs">Bugs report</label><br>

            <small class="text-danger form-control-msg">A Topic is Required</small>
        </div>
    </div>
    <div class="form-group">
        <h4>What's up?</h4>
        <textarea rows="1" name="message" id="user-text-message" class="form-control FineDiv-form-control"
                  placeholder="How can we help you? We are listening."></textarea>
        <small class="text-danger form-control-msg">A Message is Required</small>
    </div>

    <div class="text-center">
        <button type="submit" class="btn-FineDiv-form">Submit</button>
        <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
        <small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
        <small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try
            again!
        </small>
    </div>

</form>