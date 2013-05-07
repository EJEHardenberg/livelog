=begin
LiveLog.rb
This is the ruby client of LiveLog. 

Require this class to your code and use the public methods of postToServer to send information to the live log front end
=end

require 'net/http'
require "uri"

begin
	require 'rubygems'
	require 'json'
rescue LoadError
	abort "Could not load JSON gem, please run gem install JSON"
end

module LiveLog
	def self.confRead(path="config/config.php")
		#Provide an alternate path if neccesary
		if File.exists?(path)
			conf = File.new(path,'r')
		else
			abort "Could not open configuration file"
		end
		contents = conf.read
		return contents.scan(/^define\("BASEDIR", \"(.*)"\);/i).flatten[0]

	end

	class Logger
		@host
		@page
		@sessionID 
		def initialize(sessionId="")
			#Get the configuration Details
			@host = LiveLog.confRead
			@page = 'front_end/LiveLogCatch.php'
			if @host == nil
				abort "Configuration file invalid"
			end
			@sessionID = sessionId
		end

		def postToServer(var)
			#Send the var to the server for viewing
			#Catch the next to last calling party, but if we're at root level then just grab that
			callingFunc = caller[1] == nil ? caller[0] : caller[1]

			#need http:// here so request_uri works
			if(!@host.match(/http:\/\//))
				@host = 'http://' + @host
			end

			#Create the uri
			uri = URI.parse(@host + @page)
			http = Net::HTTP.new(uri.host,uri.port)
		
			request = Net::HTTP::Post.new(uri.request_uri)
			request.set_form_data({"filename"=>__FILE__, "logData"=>var,"lineNumber"=>callingFunc,"sessionID" =>@sessionID,"data"=>JSON.dump(var)})

			response = http.request(request)

			if response.code!=200
				#I'm not OKAY!!!! -MCR
				warn "Response from LiveLog Server not 200."
			end

		end
	end

end

if __FILE__==$0
	#If we're testing the module:
	l = LiveLog::Logger.new('6dk4mt6jptl0m9rujtds59gaf5')
	l.postToServer("{'Ruby' : 'info'}")

end