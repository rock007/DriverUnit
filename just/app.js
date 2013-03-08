//<debug>
Ext.Loader.setPath({
    'Ext': 'sdk/src'    
});
//</debug>

/**
 * This application demonstrates the simple AJAX abilities of Sencha Touch.
 *
 * We setup a simple container which has a 2 buttons which will trigger a function to either make
 * a AJAX request using Ext.Ajax.request or a JSONP request using Ext.data.JsonP.
 */

//the first thing we do is define out application
Ext.application({
	name:'JT',
    startupImage: {
        '320x460': 'resources/startup/Default.jpg', // Non-retina iPhone, iPod touch, and all Android devices
        '640x920': 'resources/startup/640x920.png', // Retina iPhone and iPod touch
        '640x1096': 'resources/startup/640x1096.png', // iPhone 5 and iPod touch (fifth generation)
        '768x1004': 'resources/startup/768x1004.png', //  Non-retina iPad (first and second generation) in portrait orientation
        '748x1024': 'resources/startup/748x1024.png', //  Non-retina iPad (first and second generation) in landscape orientation
        '1536x2008': 'resources/startup/1536x2008.png', // : Retina iPad (third generation) in portrait orientation
        '1496x2048': 'resources/startup/1496x2048.png' // : Retina iPad (third generation) in landscape orientation
    },

    isIconPrecomposed: false,
    icon: {
        57: 'resources/icons/icon.png',
        72: 'resources/icons/icon@72.png',
        114: 'resources/icons/icon@2x.png',
        144: 'resources/icons/icon@144.png'
    },

    //requires defines the Components/Classes that our application requires.
    requires: [
        'Ext.Container',
        'Ext.Button',
        'Ext.Toolbar',
        'Ext.TitleBar',
        'Ext.data.JsonP',
        'Ext.Ajax',
        'Ext.XTemplate'
    ],

    /**
     * The launch method is called when the browser is ready, and the application can launch.
     *
     * Within this function we create two a new container which will show the content which
     * is returned when we make an AJAX request. We also have a toolbar docked to the top which
     * has buttons to trigger the AJAX requests. And finally we have a toolbar docked to the bottom
     * which shows the status of the current request.
     */
    launch: function() {
    	  Ext.Viewport.add(	Ext.create('JT.view.Main'));
    },
    /**
     * Returns a Ext.XTemplate instance which will be used to display each weather result when makeJSONPRequest
     * is called.
     * @return {Ext.XTemplate} The returned template
     */
    getWeatherTemplate: function() {
        return new Ext.XTemplate([
            '<tpl for=".">',
                '<div class="day">',
                    '<div class="date">{date:date("M d, Y")}</div>',
                    '<div class="icon">',
                        '<tpl for="weatherIconUrl">',
                            '<img src="{value}" />',
                        '</tpl>',
                    '</div>',
                    '<div class="temp">{tempMaxF}&deg;<span class="temp_low">{tempMinF}&deg;</span></div>',
                '</div>',
            '</tpl>'
        ].join(''));
    }
});

