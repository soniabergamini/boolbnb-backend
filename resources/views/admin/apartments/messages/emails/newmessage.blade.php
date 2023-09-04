<h1>📩NEW MESSAGE FOR YOUR APARTMENT</h1>

<hr>

<p>You have received a <strong>new message</strong>. Here is the user information and message for you: </p>

<ul>
    <li>
        <span><strong>Email: </strong>{{ $message['user_mail'] }}</span>
    </li>
    <li>
        <span><strong>Message: </strong>{{ $message['text'] }}</span>
    </li>
</ul>

<hr>

<style>
    h1, p, li {
        font-family: Verdana, Geneva, Tahoma, sans-serif
    }
    h1 {
        text-align: center
    }
    li {
        margin: 1rem 0;
    }
</style>
