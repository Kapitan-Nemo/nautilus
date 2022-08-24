import liveReload from 'vite-plugin-live-reload';
const { resolve } = require('path');
const fs = require('fs');

export default {
	plugins: [liveReload(__dirname + '/**/*.php')],
	// config
	root: '',
	base: process.env.NODE_ENV === 'development' ? '/' : '/dist/',
	build: {
		// output dir for production build
		outDir: resolve(__dirname, './dist'),
		emptyOutDir: true,
		// emit manifest so PHP can find the hashed files
		manifest: true,
		// esbuild target
		target: 'es2018',
		// our entry
		rollupOptions: {
			input: {
				main: resolve(__dirname + '/main.js'),
				//page: resolve(__dirname + '/page.js')
			},
		},
		// minify switch
		minify: true,
		write: true,
	},
	server: {
		// required to load scripts from custom host
		cors: true,
		// we need a strict port to match on PHP side
		// change freely, but update in your functions.php to match the same port
		strictPort: true,
		port: 3000,
		// serve over http
		https: false,
		hmr: {
			host: 'localhost',
			//port: 443
		},
	},
};
