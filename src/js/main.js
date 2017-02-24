jQuery(document).ready(function($) {
  $('.home-slider').slick({
    arrows: false,
    fade: true,
    autoplay: true,
    autoplaySpeed: 5000
  });
  $('.history-slider').slick({
    fade: true,
    autoplay: true,
    arrows: false,
    lazyLoad: 'onsdemand'
  })
  $('#map').usmap({
    click: function(event, data) {
      $('#clicked-state')
        .text('You clicked: '+data.name)
        .parent().effect('highlight', {color: '#C7F464'}, 2000);
    },
    stateStyles: {
      fill: '#AB0534',
      stroke: '#FFF'
    },
    stateSpecificStyles: {
      'TX': { fill: '#E51937' },
      'CA': { fill: '#E51937' },
      'IL': { fill: '#E51937' },
      'WI': { fill: '#E51937' },
      'PA': { fill: '#E51937' },
      'WV': { fill: '#E51937' },
      'VA': { fill: '#E51937' },
      'FL': { fill: '#E51937' },
      'NY': { fill: '#E51937' }
    }
  });
});