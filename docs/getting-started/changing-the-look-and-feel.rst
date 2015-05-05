Changing the Look and Feel
==========================

Overview
--------

With this tutorial I want to show you how the look and feel of phpDocumentor can be changed using one of the
existing :term:`templates` or by selecting a custom-made :term:`template`.

What is a template?
-------------------

To be fair, the title of this tutorial is mildly misleading. Why? Because a template in phpDocumentor means so much
more than just the look and feel of your generated documentation.

A template in phpDocumentor is a series of actions, called 'Template Actions' (in phpDocumentor2 called
'transformations'), which are capable of crafting a desired output. With this mechanism it is possible to generate
HTML, XML, PDF but also to copy files to a destination location or generate a report of errors found while scanning
your project.

This is possible because a 'Template' is a collection of those 'Template Actions'; that can combine the assets of a
Template and the structure information of a Project's Version into a set of Documentation.

Selecting a template
--------------------

phpDocumentor has several templates_ out-of-the-box to customize the look and feel of your documentation, and more are
released on a regular basis. With these templates it is also possible to generate your documentation, or parts
thereof, in different formats. An example of this is the ``checkstyle`` template, with which you can generate an XML
file containing all documentation errors discovered by phpDocumentor in the checkstyle XML format.

To apply a template other than the default you can add the ``--template`` option::

    $ phpdoc --template="checkstyle" src build/docs

With the above command phpDocumentor will no longer output HTML output but just the XML output containing all errors
and warnings.

Using multiple templates at once
--------------------------------

Sometimes you want to generate multiple formats at the same time; you could run phpDocumentor multiple times but it is
more efficient to pass multiple templates. phpDocumentor will then optimize the generation of documentation and not
re-run those steps that they have in common.

You can instruct phpDocumentor to use multiple templates by using a comma-separated list::

    $ phpdoc --template="checkstyle,clean" src build/docs

Here you can see how both the ``checkstyle`` template and the ``clean`` template applied; which results in both
HTML documentation and an XML Checkstyle error report.

Using a custom template
-----------------------

When you have a company or project-branded template you can also use that with phpDocumentor by providing the location
of your template's folder::

    $ phpdoc --template="data/templates/my_template" src build/docs

In the above example is demonstrated how a custom template in a folder ``data/templates/my_template``, relative to the
current working directory, is being used to generate documentation with.

Adding templates to configuration
---------------------------------

.. important:: This chapter needs to be rewritten for phpDocumentorXP

Read more
---------

* :doc:`../guides/templates`

.. _templates: http://www.phpdoc.org/templates
