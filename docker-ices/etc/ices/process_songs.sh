#!/usr/bin/env bash

function errorHandler() {
	printf "Failed to process file ${file}, purging ... \n"
	rm -f ${file}
	rm -f /etc/ices/playlist/default0.txt
	printf "Regenerating playlist ... \n"
	/etc/ices/update_songs.sh
}

for file in `readlink -f /data/station_0/*.ogg`; do
timeout 5m normalize-ogg --bitrate 128 --tmpdir /tmp --force-encode --ogg ${file}
RESULT=$?
if [ ${RESULT} -eq 124 ]; then errorHandler; fi
timeout 5s lltag -F "/%i/%i/%a - %t" -G -R ${file} --append --sep _ --spaces -g "CloudTunes Rocks!" --yes
find /data/station_0 -type f -name "* *" | while read file; do mv "$file" ${file// /_}; done
#RESULT=$?
#if [ ${RESULT} -ne 0 ]; then errorHandler; fi
done
