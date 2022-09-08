$(function () {

  'use strict';

  var $image = $(window.createCropperImage());

  $image.on('cropstart.cropper', function (e) {

    QUnit.test('events#cropstart', function (assert) {
      assert.equal(e.type, 'cropstart');
      assert.equal(e.action, 'crop');
    });

  }).cropper({
    ready: function () {
      var PonterEvent = window.PonterEvent;
      var $dragBox = $image.data('cropper').$dragBox;

      // Triggers events manually when ready
      $dragBox.trigger(PonterEvent ? 'pointerdown' : 'mousedown')
        .trigger(PonterEvent ? 'pointerup' : 'mouseup');
    },

    cropstart: function (e) {

      QUnit.test('options#cropstart', function (assert) {
        assert.equal(e.type, 'cropstart');
        assert.equal(e.action, 'crop');
      });

    }
  });

});
