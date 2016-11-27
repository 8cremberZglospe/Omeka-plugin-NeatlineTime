NeatlineTime (plugin for Omeka)
===============================

[![Build Status](https://travis-ci.org/scholarslab/NeatlineTime.svg?branch=develop,master)](https://travis-ci.org/scholarslab/NeatlineTime)

The NeatlineTime plugin, by the [Scholars' Lab][scholarslab] at the University
of Virginia Library, allows you to create timelines for the [Omeka][omeka]
publishing platform. It uses the [SIMILE Timeline plugin][simile-timeline] or
the [Knightlab timeline].


Installation
------------

1. Upload the 'NeatlineTime' plugin directory to your Omeka installation's
'plugins' directory. See [Installing a Plugin][installing-a-plugin].

2. Activate the plugin from the Admin → Settings → Plugins page.

3. Configure the plugin to choose which fields you want the plugin to use on
   the timeline by default.

    * Item Title: The field you would like displayed for the item's title in
      its information bubble. The default is DC:Title
    * Item Description: The field you would like displayed for the item's
      description in its information bubble. The default is DC:Description.
    * Item Date: The field you would like to use for item dates on the
      timeline. The default is DC:Date.
    * Render Year: Date entered as a single number, like "1066", can be skipped,
      plotted as a single event or marked as a full year.
    * Center Date: The date that is displayed by the viewer when loaded. It can
      be any date with the format (YYYY-MM-DD). An empty string means now, a
      "0000-00-00" the earliest date and "9999-99-99" the latest date.

All these parameters can be customized for each timeline.


Usage
-----

Once installed, NeatlineTime will add a tab to the Omeka admin panel. From here,
you can browse existing timelines, and add, edit, and delete timelines.

Uninstalling the plugin will only remove timelines added to your Omeka archive,
not any items displayed on those timelines.

### Add a Timeline

Creating a timeline is a two-step process:

1. From the admin → NeatlineTime page, click the "Add New Timeline" button to
  begin creating a timeline.

  ![Browse Timelines](http://neatline.org/wp-content/uploads/2014/01/neatlinetime-browse.png)

2. Give your timeline a title and description, and choose whether you wish to
  make the timeline public and featured. Save your changes.

  ![Add a Timeline Form](http://neatline.org/wp-content/uploads/2014/01/neatlinetime-add-timeline.png)

3. To choose which items appear on your timeline, click the "Edit Query" link
  beside your existing timeline.

  ![Edit Query Link](http://neatline.org/wp-content/uploads/2014/01/neatlinetime-timeline-saved.png)

4. This will take you to a form similar to Omeka's advanced search form. From
  here, you can perform a search for any items in your archive, and if those
  items contain a valid date in their Dublin Core:Date field, they will be
  displayed on the timeline.

  ![Edit Query](http://neatline.org/wp-content/uploads/2014/01/neatlinetime-item-query.png)

5. With a query defined, the matching items will be rendered on the timeline:

  ![Timeline](http://neatline.org/wp-content/uploads/2014/01/neatlinetime-admin-show.png)

### Dates for Items

NeatlineTime will attempt to convert the value for a date string into an
ISO-8601 date format. Some example date values you can use:

  * January 1, 2012
  * 2012-01-01
  * 1 Jan 2012
  * 2012-12-15

To denote spans of time, separate the start and end date with a '/':

  * January 1, 2012/February 1, 2012

NeatlineTime handles dates with years shorter than 4 digits. For these you'll
need to pad the years with enough zeros to make them have four digits. For
example, `476` should be written `0476`.

Also, you can enter in years before common era by putting a negative sign
before the year. If the date has less than four digits, you'll also need to add
extra zeros.

So here are some more examples of dates.

  * 0200-01-01
  * 0002-01-01
  * -0002-01-01
  * -2013-01-01

When a date is a single number, like "1066", a parameter in the config page
allows to choose its rendering:

  * skip the record (default)
  * 1st January
  * 1st July
  * full year (range period)

This parameter applies with a range of dates too, for example "1939/1945".

In all cases, it's recommended to follow the standard [ISO 8601] as much as
possible and to be as specific as possible.

### Browsing timelines

You can browse existing timelines by clicking on the "Browse Timelines" from
your public theme, or the "NeatlineTime" tab in the admin panel.

### Viewing specific timelines

You can always see your timeline by click the title of the timeline in the
admin. The URL for your timelines will be 'neatline-time/timelines/show/[id]',
where [id] is the ID number for your timeline.

  ![Public Show](http://neatline.org/wp-content/uploads/2014/01/neatlinetime-public-show.png)

### Modifying theme templates for Neatline Time

Neatline Time contains theme templates that control how its various pages are
displayed in your public theme. As with other Omeka plugins, you can override
these using the instructions on the [Theming Plugin Pages][themeing-plugin-pages]
codex page.

The template files available in NeatlineTime include:

* timelines/browse.php - The template for browsing existing timelines.
* timelines/show.php - The template for showing a specific timeline.


Contributing to the Project
---------------------------

### Feedback

We rely on the [Github issues tracker][issues] for feedback on issues and
improvements.

### Patches/Pull Requests

* Fork the project.
* Make your feature addition or bug fix.
* Add tests for it, and make sure all the tests pass. This is important so we
  don't unknowingly break your changes in a future release. If you're fixing a
  bug, it helps us to verify that your bug does in fact exist. Both NeatlineTime
  and Omeka use [PHPUnit][phpunit] to ensure the quality of the software.
* Commit your changes to your own fork.
* Send us a pull request, with a clear explanation of the changes. Bonus points
  for topic branches.


Warning
-------

Use it at your own risk.

It's always recommended to backup your files and database regularly so you can
roll back if needed.


Troubleshooting
---------------

See online issues on the plugin [issues] page on GitHub.


License
-------

This plugin is published under [Apache licence v2].
See [LICENSE][license] for more information.


Credits
-------

### Translations

* Martin Liebeskind (German)
* Gillian Price (Spanish)
* Oguljan Reyimbaeva (Russian)
* Katina Rogers (French)

### Contact

* Scholar's Lab (see [ScholarLab] on GitHub)
* Daniel Berthereau (see [Daniel-KM] on GitHub)

### Copyright

* Copyright (c) 2010–2012 The Board and Visitors of the University of Virginia.
* Copyright Daniel Berthereau, 2016


[scholarslab]: http://scholarslab.org
[omeka]: http://omeka.org
[simile-timeline]: http://www.simile-widgets.org/wiki/Timeline
[Knightlab timeline]: https://timeline.knightlab.com
[installing-a-plugin]: http://omeka.org/codex/Installing_a_Plugin
[Apache licence v2]: https://www.apache.org/licenses/LICENSE-2.0.html
[license]: http://www.apache.org/licenses/LICENSE-2.0.html "Apache License, Version 2.0"
[issues]: http://github.com/scholarslab/NeatlineTime/issues/ "Issues for Neatline Time"
[phpunit]: http://www.phpunit.de/manual/current/en/ "PHP Unit"
[ISO 8601]: http://www.iso.org/iso/home/standards/iso8601.htm
[themeing-plugin-pages]: http://omeka.org/codex/Theming_Plugin_Pages "Theming Plugin Pages"
[ScholarLab]: https://github.com/scholarslab "Scholar's Lab"
[Daniel-KM]: https://github.com/Daniel-KM "Daniel Berthereau"
