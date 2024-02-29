<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
        public function addContact(Request $request)
        {
            try {
                $contactArray = json_decode($request->getContent(), true);
    
                $contactName = $contactArray['contact_name'];
                $contact_email = $contactArray['contact_email'];
                $contactSubject = $contactArray['contact_subject'];
                $contactMessage = $contactArray['contact_message'];
                
    
                $result = Contact::create([
                    'contact_name' => $contactName,
                    'contact_email' => $contact_email,
                    'contact_subject' => $contactSubject,
                    'contact_message' => $contactMessage,
                    

                ]);
    
                if ($result) {
                    return "Message Sent Successfully";
                } else {
                    return "Message Sent Failed";
                }
            } catch (\Exception $e) {
                // Log or handle the exception as needed
                
                return "An error occurred while processing the request.";
            }
        }

        public function AllContact(){
            $result = Contact::all();
            return view('backend.contact.list_contact',compact('result'));
        }

        public function DeleteContact($id){
            $result = Contact::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Contact Deleted Successfully');
        }
}
