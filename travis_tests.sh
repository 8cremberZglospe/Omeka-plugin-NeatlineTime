#! /usr/bin/env bash

if [ -z $PLUGIN_DIR ]; then
  PLUGIN_DIR=`pwd`
fi

echo "Plugin Directory: $PLUGIN_DIR"

cd $PLUGIN_DIR/tests/ && phpunit --coverage-text 
