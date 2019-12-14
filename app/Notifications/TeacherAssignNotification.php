<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TeacherAssignNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $teacherAssign;
    

    public function __construct($teacherAssign)
    {
        $this->teacherAssign = $teacherAssign;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Delar .'.$this->teacherAssign->teacher->name)
                    ->line('Your class assign these semester')
                    ->line("Faculty : ".$this->teacherAssign->faculty->facultyName)
                    ->line("Department : ".$this->teacherAssign->department->departmentName)
                    ->line("Semester : ".$this->teacherAssign->semester->semesterName)
                    ->line("Program : ".$this->teacherAssign->program->programeName)
                    ->line("Course: ".$this->teacherAssign->course->courseName."   | Course code ".$this->teacherAssign->course->courseCode)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
