#directories first
find -type d | xargs chmod 771
#all files first
find -type f | xargs chmod 644
#php files then
find -type f -name "*.php*" | xargs chmod 700
find -type f -name "autochmod.sh" | xargs chmod 744

echo "done changing permissions for folders below that one"
echo "you now should have a working web page"