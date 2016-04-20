<p>
	Hello {{ $userRecieving->first_name }} {{ $userRecieving->last_name }}!
	</br>
	</br>
	{{ $userSending->first_name }} {{ $userSending->last_name }} is interested in your property at {{ $listingInfo->listing->location->street_address }}.
	</br>
	Contact them with information at {{ $userSending->email }}, or {{ $userSending->phone }}.
</p>
