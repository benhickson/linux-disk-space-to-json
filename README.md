# Linux Disk Space to JSON

One-file PHP script that can provide your application with a JSON of your disk utilization. 

## Usage

Just drop this somewhere on a server with PHP and make requests to it.

Adding `?format=json` to the request URL provides JSON. `?format=human` prints a human-readable view. If you don't provide a format, it will ask you for one.

Tested with Ubuntu. Uses `df`, so likely works with most Linux flavors.

#### More about the `df` command

`df` is a linux shell command that provides a response similar to this:

```bash
ben:~$ df -h
Filesystem      Size  Used Avail Use% Mounted on
udev            487M     0  487M   0% /dev
tmpfs           100M   11M   89M  11% /run
/dev/vda1        25G  9.2G   16G  38% /
tmpfs           497M     0  497M   0% /dev/shm
tmpfs           5.0M     0  5.0M   0% /run/lock
tmpfs           497M     0  497M   0% /sys/fs/cgroup
/dev/sda         50G   43G  5.1G  90% /mnt/volume_nyc3_01
tmpfs           100M     0  100M   0% /run/user/1000
```
> Note: `-h` flag used here displays space in "M(egabytes)" or "G(igabytes)", as appropriate. The script itself uses `df` without flags, so as to provide all space in "1K Blocks" (roughly kilobytes) in a consistent way.

<br>

### Notes
`shell_exec()` may be blocked on shared hosts. If you get those sorts of errors, you probably have a dashboard for your disk space, and don't need this.
