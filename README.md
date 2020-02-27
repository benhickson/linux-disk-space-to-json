# Linux Disk Space to JSON

One-file PHP script that can provide your application with a JSON of your disk utilization. 

## Usage

Just drop this somewhere on a server with PHP and make requests to it.

Adding `?format=json` to the request URL provides JSON. `?format=human` prints a human-readable view. If you don't provide a format, it will ask you for one.

Tested with Ubuntu. Uses `df`, so likely works with most Linux flavors.

<br>

### Notes
`shell_exec()` may be blocked on shared hosts. If you get those sorts of errors, you probably have a dashboard for your disk space, and don't need this.
