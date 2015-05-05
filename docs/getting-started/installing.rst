Installing
==========

System Requirements
-------------------

phpDocumentor has several dependencies on other software packages. Please make sure that you have these installed before
installing phpDocumentor.

-  `PHP 5.5.0`_
-  `intl extension for PHP`_

.. note::

    Some of the templates make use of the XSL templating language; these templates need the following dependency as
    well. By default phpDocumentor uses a template based on the Twig_ templating language; which does not have
    this requirement.

    -  `XSL extension for PHP`_

PHAR
----

You can download the latest PHAR file from http://www.phpdoc.org/phpDocumentor.phar.

.. important::

   Some installations of PHP can have trouble executing the phar file. If you have any issues, please consult the
   following website first: http://silex.sensiolabs.org/doc/phar.html#pitfalls

The phar file can be used by simply invoking php and providing the phar file as a parameter::

  $ php phpDocumentor.phar src build/docs

Using Composer
--------------

phpDocumentor can also be installed using Composer as dependency in your project; this is however not a supported method
of installation. We have chosen not to actively support this installation method because a Composer installation has
specific requirements since the dependencies and autoloader are in a different location and sometimes unwanted
side-effects can occur.

phpDocumentor also installs a fair amount of dependencies in your project, including a framework and Dependency
Injection Container that may convolute your own project and cause unintended conflicts.

.. _`PHP 5.5.0`:            http://www.php.net
.. _intl extension for PHP: http://www.php.net/intl
.. _XSL extension for PHP:  http://www.php.net/xsl
.. _Twig:                   http://twig.sensiolabs.org
