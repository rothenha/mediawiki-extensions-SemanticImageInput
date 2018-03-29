<?php

class PFImageInputHooks {

      /**
       * @param $parser Parser
       * @return bool
       */
      public static function efPFIISetup( & $parser ) {
            global $egPFIISettings;
            $egPFIISettings = array();
            global $wgPageFormsFormPrinter;
            $wgPageFormsFormPrinter->registerInputType( 'InstantImageInput' );
      }
}
