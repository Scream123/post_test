# POST Test

### A way to test before POSTing

1. Host this directory.
2. In `api_test.php`, set `$post` to whatever you want to send.
1. Change `$url` in `api_test.php` to the url where `post_node.php` is hosted.
2. Run api_test.php (doesn't have to be where hosted)
3. Visit `index.html`. It will keep a running record of everything you send with `api_test.php`.