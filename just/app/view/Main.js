/**
 * 
 */

Ext.define("JT.view.Main", {
			extend:'Ext.tab.Panel',
			config : {
						fullscreen : true,
						tabBarPosition : 'bottom',
						items : [
								{
									title : '主页',
									iconCls : 'home',
									cls : 'home',
									html : [
											'<img width="65%" src="http://staging.sencha.com/img/sencha.png" />',
											'<h1>Welcome to Sencha Touch</h1>',
											"<p>You're creating the Getting Started app. This demonstrates how ",
											"to use tabs, lists and forms to create a simple app</p>",
											'<h2>Sencha Touch 2</h2>' ]
											.join("")
								},
								{
									xtype : 'nestedlist',
									title : '热门路线',
									iconCls : 'star',
									displayField : 'title',

									store : {
										type : 'tree',

										fields : [ 'title', 'link', 'author',
												'contentSnippet', 'content', {
													name : 'leaf',
													defaultValue : true
												} ],

										root : {
											leaf : false
										},

										proxy : {
											type : 'jsonp',
											url : 'https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q=http://feeds.feedburner.com/SenchaBlog',
											reader : {
												type : 'json',
												rootProperty : 'responseData.feed.entries'
											}
										}
									},

									detailCard : {
										xtype : 'panel',
										scrollable : true,
										styleHtmlContent : true
									},

									listeners : {
										itemtap : function(nestedList, list,
												index, element, post) {
											
											alert(post.get('content'));
											this.getDetailCard().setHtml(
													post.get('content'));
										}
									}
								},
								//this is the new item
								{
									title : '个人中心',
									iconCls : 'user',
									xtype : 'formpanel',
									url : 'contact.php',
									layout : 'vbox',

									items : [
											{
												xtype : 'fieldset',
												title : 'Contact Us',
												instructions : '(email address is optional)',
												items : [ {
													xtype : 'textfield',
													label : 'Name'
												}, {
													xtype : 'emailfield',
													label : 'Email'
												}, {
													xtype : 'textareafield',
													label : 'Message'
												} ]
											},
											{
												xtype : 'button',
												text : 'Send',
												ui : 'confirm',
												handler : function() {
													this.up('formpanel')
															.submit();
												}
											} ]
								} ]
}
        });
    